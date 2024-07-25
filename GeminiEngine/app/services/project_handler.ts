import { genreEquityStructure, risksStructure } from './DTO/generated_sections.js'
// import { ProjectData } from './DTO/project.js'
import { gemini } from './gemini.js'

export default class ProjectHandler {
  projectData: any
  chat: any
  constructor(ProjectData: any) {
    this.projectData = ProjectData
    this.chat = gemini.startChat({
      history: [
        {
          role: 'user',
          parts: [
            { text: 'Tu es un expert de la gestion du projet et de la rédaction' },
            {
              text:
                "Considérant les données d'un projet suivant : " + JSON.stringify(this.projectData),
            },
          ],
        },
      ],
    })
  }

  async generate(text: string) {
    const result = await gemini.generateContent(text)
    const response = result.response
    return response.text()
  }
  async generateGenreEqualityData() {
    const prompt =
      "Génère des stratégies de maintient d'équité du genre. Fais des paraches concis et claires. Tu utiliseras la structure suivante " +
      JSON.stringify(genreEquityStructure)

    const result = await this.chat.sendMessage(prompt)
    const response = await result.response
    return response.text()
  }

  async generateRisksData() {
    const prompt =
      'En prenant en compte le contexte et les réalités éventutelles du projet, génère des stratégies de gestion de risque en précisant pour chaque stratégie, le risque indexé. Fais des paraches concis et claires. Tu utiliseras la structure suivante ' +
      JSON.stringify(risksStructure)

    const result = await this.chat.sendMessage(prompt)
    const response = await result.response
    return response.text()
  }
}
