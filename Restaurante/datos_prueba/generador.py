ape=["Salcedo","López","Órtiz","Castaña","Iturbide","Gárces","Moreno","Ibarra","Llamas","Munjía","Garnica","Jauregui","Gomez","Luna","De la Barrera","Naranjo","Bernal","Camberos","Ibañes","Iñigues","Lara","Cruz","Vetancour","Nava","Medina","Peñaloza","Martinez","Carlos","Roque","Padilla","Becerra"]

nom=["Luis","Juan","Salvador","Ivan","Alan","Daniel","Carlos","Pablo","Alejandro","Maria","Giovani","Jovani","Cesar","Oliver","Esteban","Efraín","Kevin","Brayan","Bryan","Luisa","Carla","Dolores","Perla","Estefania","Xochitl","Mariela","Hilda","Gracia","Federico","Ines","Ana","Ariana"]
nums=["0","1","2","3","4","5","6","7","8","9"]
stat=["Pendiente","Aceptado","Cancelado"]
usr=["cadicarus","pepecort","lilabel","cascaso","elmocos"]
from random import choice
import io
from random import randint
def generacion():
        file = open("Reservaciones","w")
        
        for i in range(20):
                nombre=choice(nom)+" "+choice(ape)+" "+choice(ape)
                tel="311"+str(randint(100,999))+choice(nums)+choice(nums)+choice(nums)+choice(nums)
                hora=str(randint(0,12))+":"+str(randint(0,5))+choice(nums)
                fecha=str(randint(1,12))+"/"+str(randint(1,30))+"/"+"2016"
		status=choice(stat)
		usuario=choice(usr)
                # id | nombre | tel | hora | fecha | status | usuario
                file.write(str(i)+"|"+nombre+"|"+tel+"|"+hora+"|"+fecha+"|"+status+"|"+usuario+"\n")
                #file.write(i+"|"+nombre+"|"+tel+"|"+hora+"|"+fecha+"\n")

        file.close()

	
generacion()


file= open("Reservaciones","r")

print(file.read())
file.close()

